Pagination of Children Within Folders
=====================================

Introduction
------------
This modules provides shorthand methods to incorporate paging of children in a folder

Usage
-----

### Listing Items on a Page

In your template do the following:

	<% control PagedChildren(*ClassName*, *NumberToShowPerPage*) %>

For example, the following will show 8 NewsItem objects per rendered page.

    <% control PagedChildren(NewsItem,8) %>

Render the list of items as you see fit for your website using normal templating code.


### Pagination Links
Simply add this line to include pagination links (1,2,3... etc) in your template

    <% include Pagination %>