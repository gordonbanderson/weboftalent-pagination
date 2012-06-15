<?php

class Paginator_Controller_Extension extends Extension {

  /*
  Call this from a template to iterate through a number of items (default 10) for the
  currently selected page.  The result is saved as a variable called $this->lastPagedResults for
  caching purposes when it comes to rendering the pagination

  <code>
  <% control PagedChildren(NewsItem,8) %>
    <li>
    <a href="$Link">$Title</a>
    <br/>
    <a href="$Link">$NewsItemImage.SetWidth(200)</a>
    <br/>
    <a href="$Link">$NewsItemDate.Nice</a>

    </li>
    <% end_control %>
  </code>
  */
	function PagedChildren($klazz, $childrenPerPage = 10) {
 
    $pageLength = $childrenPerPage;
    $parentID = $this->owner->ID;

    $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
    $total = DB::query("SELECT COUNT(*) FROM SiteTree where ParentID=".$parentID)->value();
    $NumberPages = 1 + ($total / $pageLength);

    $results= DataObject::get($klazz, 
      "ParentID=".$parentID,//filter
      '',//$sort,//sort
      //'',
      '',
      $start.','.$pageLength//limit
      );

      $this->lastPagedResults = $results;
      return $results;
  }


  /*
    A cached copy of the pagination results
  */
  function LastPagedResults() {
    return $this->lastPagedResults;
  }

}
?>