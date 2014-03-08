<?php
include_once 'conf.php';
include_once 'pdo_mysql.php';
include_once 'helpers.php';

class IIFdb {
  // Construct and Destruct
  public function __construct() {
      $this->connection = PDOMysql::getInstance();
  }
  public function __destruct() {
      $this->connection = null;
  }

  public function outputWeList() {
    $statement = 'SELECT * FROM items_we ORDER BY id DESC';
    $query = $this->connection->execute($statement);
    $weItemsDB = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($weItemsDB as $item) {
      echo '<div class="line" title="' . $item['link'] . '">' . $item['title'] . '</div>';
    }
  }

  public function outputIList() {
    $statement = 'SELECT * FROM items_i ORDER BY id DESC';
    $query = $this->connection->execute($statement);
    $iItemsDB = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($iItemsDB as $item) {
      echo '<div class="line" title="' . $item['link'] . '">' . $item['title'] . '</div>';
    }
  }

  public function updateLists() {
    // Get timestamp for now and one day ago.
    $now = time();
	
    $oneDayAgo = $now - 60 * 60 * 24;

    echo date('Y-m-d H:i:s', $now) . " - Starting cronjob\n";

    // Get the database content from the last 24 hours.
    $statement = 'SELECT * FROM items_we WHERE datetime > :oneDayAgo';
    $query = $this->connection->execute($statement, array('oneDayAgo' => $oneDayAgo));
    $weItemsDB = $query->fetchAll(PDO::FETCH_ASSOC);

    $statement = 'SELECT * FROM items_i WHERE datetime > :oneDayAgo';
    $query = $this->connection->execute($statement, array('oneDayAgo' => $oneDayAgo));
    $iItemsDB = $query->fetchAll(PDO::FETCH_ASSOC);

    // Get links to feeds.
    $strFeeds = file_get_contents('feeds.txt', FILE_USE_INCLUDE_PATH);
    //$feeds = explode("\r", $strFeeds);
    $feeds = preg_split("/\r\n|\n|\r/", $strFeeds);
	
    // Added items go into this array
    $addedItems = array();

    // Check for new content in each feed.
    foreach ($feeds as $feed) {
      if (Helpers::startsWith($feed, "http")) {
        $qMatch = preg_split("/\?/", $feed);
        if (count($qMatch) > 1)
          $feedContent = file_get_contents($feed . "&randomNumber=" . rand(0,99999999999));
        else
          $feedContent = file_get_contents($feed . "?randomNumber=" . rand(0,99999999999));
        if ($xml = simplexml_load_string($feedContent)) {
          echo "Processing: " . $feed . "\n";
          foreach ($xml->xpath("//item") as $item) {
            // Get data for item
            $title = $item->title;
            $link  = $item->link;
            $time = time();

            // Split title at : if it exists, choose the text on the right of the colon.
            // TODO: add handling of more colons
            $splitTitle = explode(":", $title);
            if (count($splitTitle) == 2) {
              $title = $splitTitle[1];
            }

            // Remove leading and trailing whitespace.
            $title = trim($title);

            if (in_array($title, $addedItems)) {
              continue;
            }

            // Check if the title starts with "Vi " or "Jeg " and set relevant variables.
            if (Helpers::startsWith($title, "Vi ")) {
              $dbTable = 'items_we';
              $dbItems = $weItemsDB;
            }
            elseif (Helpers::startsWith($title, "Jeg ")) {
              $dbTable = 'items_i';
              $dbItems = $iItemsDB;
            }
            else {
              continue;
            }

            if (Helpers::blackListedLink($link)) {
              continue;
            }


            // Avoid link and title combination
            $statement = 'SELECT * FROM ' . $dbTable . ' WHERE title = :title AND link = :link';
            $query = $this->connection->execute($statement, array('title' => $title,
              'link'  => $link));

            if (count($query->fetchAll(PDO::FETCH_ASSOC)) == 0) {
              // Avoid title repeat, last 24 hours
              $inDB = false;
              foreach ($dbItems as $dbItem) {
                // Avoid the same title
                if (strpos($title, $dbItem['title']) == 0) {
                  $inDB = true;
                  break;
                }
              }

              if ($inDB) continue;

              // Add the item to the db
              $statement = 'INSERT INTO ' . $dbTable . ' (title, link, datetime) VALUES (:title, :link, :datetime)';
              $this->connection->execute($statement, array('title' => $title,
                'link' => $link,
                'datetime' => $time));

              array_push($addedItems, $title);
            }
          }
        } else {
          echo "warning: " . $feed . " was not fetched correctly.\n";
        }
      }
    }
    echo date('Y-m-d H:i:s', time()) . "Done!\n";
  }

}

