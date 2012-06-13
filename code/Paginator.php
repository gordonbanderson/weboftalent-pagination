<?php

class Paginator_Controller_Extension extends Extension {

	function PagedChildren($klazz, $childrenPerPage = 10) {
    //error_log("+++++++++++++++++++++");
    //error_log("N children:".$childrenPerPage);

    $pageLength = $childrenPerPage;
    $parentID = $this->owner->ID;


  /*
    if ($this->ClassName == 'NewsItemsFolder') {
      if ($this->ItemsPerPage) {
        $pageLength = $this->ItemsPerPage;
        //error_log("Items per page:".$childrenPerPage);
      }
    }
*/
    $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;

    $sort = '';
    if ($klazz === 'NewsItem') {
      $sort = 'NewsItemDate DESC';
    }


    $total = DB::query("SELECT COUNT(*) FROM SiteTree where ParentID=".$parentID)->value();
    $NumberPages = 1 + ($total / $pageLength);

    error_log("KLAZZ:".$klazz);
    error_log("SORT:".$sort);

     $results= DataObject::get($klazz, 
      "ParentID=".$parentID,//filter
      $sort,//sort
      //'',
      '',
      $start.','.$pageLength//limit
      );

      $this->lastPagedResults = $results;

     // error_log(print_r($results,1));

      return $results;
  }


  function LastPagedResults() {
    error_log("Getting last page of results");
    error_log(count($this->lastPagedResults));
    return $this->lastPagedResults;
  }

}
?>