#Paged Child Helper
[![Build Status](https://travis-ci.org/gordonbanderson/weboftalent-pagination.svg?branch=master)](https://travis-ci.org/gordonbanderson/weboftalent-pagination)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-pagination/build-status/master)
[![codecov.io](https://codecov.io/github/gordonbanderson/weboftalent-pagination/coverage.svg?branch=master)](https://codecov.io/github/gordonbanderson/weboftalent-pagination?branch=master)

[![Latest Stable Version](https://poser.pugx.org/weboftalent/child-pagination/version)](https://packagist.org/packages/weboftalent/child-pagination)
[![Latest Unstable Version](https://poser.pugx.org/weboftalent/child-pagination/v/unstable)](//packagist.org/packages/weboftalent/child-pagination)
[![Total Downloads](https://poser.pugx.org/weboftalent/child-pagination/downloads)](https://packagist.org/packages/weboftalent/child-pagination)
[![License](https://poser.pugx.org/weboftalent/child-pagination/license)](https://packagist.org/packages/weboftalent/child-pagination)
[![Monthly Downloads](https://poser.pugx.org/weboftalent/child-pagination/d/monthly)](https://packagist.org/packages/weboftalent/child-pagination)
[![Daily Downloads](https://poser.pugx.org/weboftalent/child-pagination/d/daily)](https://packagist.org/packages/weboftalent/child-pagination)

[![Dependency Status](https://www.versioneye.com/php/weboftalent:child-pagination/badge.svg)](https://www.versioneye.com/php/weboftalent:child-pagination)
[![Reference Status](https://www.versioneye.com/php/weboftalent:child-pagination/reference_badge.svg?style=flat)](https://www.versioneye.com/php/weboftalent:child-pagination/references)

![codecov.io](https://codecov.io/github/gordonbanderson/weboftalent-pagination/branch.svg?branch=master)

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
