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
  function PagedChildren( $klazz, $childrenPerPage = 10 ) {

    $pageLength = $childrenPerPage;

    $parentID = $this->owner->ID;
    $offset = 0;
    if ( isset( $this->PagedOffset ) ) {
      $offset = $this->PagedOffset;
    }

    $start = isset( $_GET['start'] ) ? (int)( Convert::raw2sql( $_GET['start'] ) ) : 0;
    $total = DB::query( "SELECT COUNT(*) FROM SiteTree where ParentID=".$parentID )->value();
    $total = $total - $offset;
    $NumberPages = 1 + ( $total / $pageLength );

    $this->PageNumber = 1+$start/$pageLength;

    $results= DataObject::get( $klazz,
      "ParentID=".$parentID, //filter
      '', //$sort,//sort
      //'',
      '',
      $start+$offset.','.$pageLength//limit
    );

    $results->pageStart = $results->pageStart-$offset;

    $ctr = $start+1;
    foreach ( $results as $result ) {
      $result->IteratorPosition = $ctr;
      $ctr = $ctr + 1;
    }

    $this->lastPagedResults = $results;
    return $results;
  }


  function PagedDataObjectsByClassName( $klazz, $childrenPerPage = 10, $sort = 'ASC' ) {

    $pageLength = $childrenPerPage;

    $parentID = $this->owner->ID;
    $offset = 0;
    if ( isset( $this->PagedOffset ) ) {
      $offset = $this->PagedOffset;
    }

    $start = isset( $_GET['start'] ) ? (int)( Convert::raw2sql( $_GET['start'] ) ) : 0;
    $total = DB::query( "SELECT COUNT(*) FROM SiteTree where ClassName='$klazz'" )->value();
    $total = $total - $offset;
    $NumberPages = 1 + ( $total / $pageLength );

    $this->PageNumber = 1+$start/$pageLength;

    $results= DataObject::get( $klazz,
      '', //filter
      'LastEdited '.$sort, //$sort,//sort
      //'',
      '',
      $start+$offset.','.$pageLength//limit
    );

    if ( $results ) {
      $results->pageStart = $results->pageStart-$offset;

      $ctr = $start+1;
      foreach ( $results as $result ) {
        $result->IteratorPosition = $ctr;
        $ctr = $ctr + 1;
      }
    }



    $this->lastPagedResults = $results;
    return $results;
  }




  function SetPagedOffset( $newoffset ) {
    $this->PagedOffset = $newoffset;
  }


  function PagedChildrenAllButFirst() {

  }


  /*
  The current page number.  This is only populated after the call to PagedChildren
  */
  function PageNumber() {
    return $this->PageNumber; // variable, not the method, populated when loading the pages items
  }


  /*
    A cached copy of the pagination results
  */
  function LastPagedResults() {
    return $this->lastPagedResults;
  }

}
?>
