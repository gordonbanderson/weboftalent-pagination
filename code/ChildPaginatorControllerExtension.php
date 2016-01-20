<?php

class ChildPaginatorControllerExtension extends Extension
{
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
    public function PagedChildren($klazz, $pageLength = 10, $prime = false, $relationship_key = 'ParentID')
    {
        $parentID = $this->owner->ID;
        $req = Controller::curr()->getRequest();
        $list = DataList::create($klazz)->where('"ParentID" = '.$parentID);
        $this->lastPagedResults = new PaginatedList($list, $req);
        $this->lastPagedResults->setPageLength($pageLength);
        $this->lastPagedResults->setLimitItems($pageLength);
        $result = $this->lastPagedResults;
        if ($prime == true) {
        $result = ''; // render nothing to the template, we are only updating variables
        }

        return $result;
    }

    public function AllPagedChildren($pageLength = 10, $sort = 'Sort', $prime = false, $relationship_key = 'ParentID')
    {
        $parentID = $this->owner->ID;
        $req = Controller::curr()->getRequest();
        $list = SiteTree::get()->where('"ParentID" = '.$parentID);
        $this->lastPagedResults = new PaginatedList($list, $req);
        $this->lastPagedResults->setPageLength($pageLength);
        $this->lastPagedResults->setLimitItems($pageLength);
        $result = $this->lastPagedResults;
        if ($prime == true) {
            $result = ''; // render nothing to the template, we are only updating variables
        }

        return $result;
    }

    public function PagedDataObjectsByClassName($klazz, $pageLength = 10, $sort = 'ASC')
    {
        $req = Controller::curr()->getRequest();
        $this->lastPagedResults = new PaginatedList(DataList::create($klazz)->sort('LastEdited '.$sort), $req);
        $this->lastPagedResults->setPageLength($pageLength);
        $this->lastPagedResults->setLimitItems($pageLength);

        return $this->lastPagedResults;
    }

    public function SetPagedOffset($newoffset)
    {
        $this->PagedOffset = $newoffset;
    }

    public function PagedChildrenAllButFirst()
    {
    }

    /*
    The current page number.  This is only populated after the call to PagedChildren
    */
    public function PageNumber()
    {
        return $this->PageNumber; // variable, not the method, populated when loading the pages items
    }

    /*
    A cached copy of the pagination results
    */
    public function LastPagedResults()
    {
        return $this->lastPagedResults;
    }
}
