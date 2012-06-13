<% if LastPagedResults.MoreThanOnePage %>
    <div class="pagination pagination-centered">
      <ul>
      <% if LastPagedResults.NotFirstPage %>
        <li><a class="prev" href="$LastPagedResults.PrevLink" title="View the previous page">Prev</a></li>
      <% end_if %>
        <% control LastPagedResults.Pages %>
          <% if CurrentBool %>
            <li class="active"><a href="#">$PageNum</a></li>
          <% else %>
            <li><a href="$Link" title="View page number $PageNum">$PageNum</a></li>
          <% end_if %>
        <% end_control %>

      <% if LastPagedResults.NotLastPage %>
        <li><a class="next" href="$LastPagedResults.NextLink" title="View the next page">Next</a></li>
      <% end_if %>
      </ul>
    </div>
  <% end_if %>

