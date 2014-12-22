<% if LastPagedRides.MoreThanOnePage %>
  <div class="pagination-centered">
      <ul class="pagination">
      <% if LastPagedRides.NotFirstPage %>
        <li><a class="prev" href="$LastPagedRides.PrevLink" title="View the previous page">&laquo;</a></li>
      <% end_if %>
        <% loop LastPagedRides.Pages %>
          <% if CurrentBool %>
            <li class="current"><a href="#">$PageNum</a></li>
          <% else %>
            <li><a href="$Link" title="View page number $PageNum">$PageNum</a></li>
          <% end_if %>
        <% end_loop %>

      <% if LastPagedRides.NotLastPage %>
        <li><a class="next" href="$LastPagedRides.NextLink" title="View the next page">&raquo;</a></li>
      <% end_if %>
      </ul>
  </div>
<% end_if %>