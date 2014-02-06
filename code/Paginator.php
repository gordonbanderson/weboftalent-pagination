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
  function PagedChildren( $klazz, $pageLength = 10, $prime = false ) {
    $parentID = $this->owner->ID;
    $req = Controller::curr()->getRequest();
    $this->lastPagedResults = new PaginatedList(DataList::create($klazz)->where('"ParentID" = '.$parentID), $req);
    $this->lastPagedResults->setPageLength($pageLength);
    $this->lastPagedResults->setLimitItems($pageLength);
    $result = $this->lastPagedResults;
    if ($prime == true) {
      $result = ''; // render nothing to the template, we are only updating variables
    }

    return $result;
  }


  function PagedDataObjectsByClassName( $klazz, $pageLength = 10, $sort = 'ASC') {
    $req = Controller::curr()->getRequest();
    $this->lastPagedResults = new PaginatedList(DataList::create($klazz)->sort('LastEdited '.$sort), $req);
    $this->lastPagedResults->setPageLength($pageLength);
    $this->lastPagedResults->setLimitItems($pageLength);
    return $this->lastPagedResults;
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
