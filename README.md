#Paged Child Helper
[![Build Status](https://travis-ci.org/gordonbanderson/weboftalent-pagination.svg?branch=(no)](https://travis-ci.org/gordonbanderson/weboftalent-pagination)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/badges/quality-score.png?b=(no)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/?branch=(no)
[![Code Coverage](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/badges/coverage.png?b=(no)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/?branch=(no)
[![Build Status](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/badges/build.png?b=(no)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/build-status/(no)
[![codecov.io](https://codecov.io/github/gordonbanderson/weboftalent-pagination/coverage.svg?branch=(no)](https://codecov.io/github/gordonbanderson/weboftalent-pagination?branch=(no)

[![Latest Stable Version](https://poser.pugx.org/weboftalent/pagination/version)](https://packagist.org/packages/weboftalent/pagination)
[![Latest Unstable Version](https://poser.pugx.org/weboftalent/pagination/v/unstable)](//packagist.org/packages/weboftalent/pagination)
[![Total Downloads](https://poser.pugx.org/weboftalent/pagination/downloads)](https://packagist.org/packages/weboftalent/pagination)
[![License](https://poser.pugx.org/weboftalent/pagination/license)](https://packagist.org/packages/weboftalent/pagination)
[![Monthly Downloads](https://poser.pugx.org/weboftalent/pagination/d/monthly)](https://packagist.org/packages/weboftalent/pagination)
[![Daily Downloads](https://poser.pugx.org/weboftalent/pagination/d/daily)](https://packagist.org/packages/weboftalent/pagination)

[![Dependency Status](https://www.versioneye.com/php/weboftalent:pagination/badge.svg)](https://www.versioneye.com/php/weboftalent:pagination)
[![Reference Status](https://www.versioneye.com/php/weboftalent:pagination/reference_badge.svg?style=flat)](https://www.versioneye.com/php/weboftalent:pagination/references)

![codecov.io](https://codecov.io/github/gordonbanderson/weboftalent-pagination/branch.svg?branch=(no)
##Introduction
This modules provides shorthand methods to incorporate paging of children in a
folder

##Usage

### Listing Items on a Page
In your template do the following:

	<% control PagedChildren(*ClassName*, *NumberToShowPerPage*) %>

For example, the following will show 8 NewsItem objects per rendered page.

    <% control PagedChildren(NewsItem,8) %>

Render the list of items as you see fit for your website using normal templating
code.

### Pagination Links
Simply add this line to include pagination links (1,2,3... etc) in your template

    <% include ChildPagination %>
