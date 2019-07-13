@if ($paginator->hasPages())
  <ul class="pagination" role="navigation">
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <li><button type="submit" class="btn btn-primary btn_quiz">Next Quiz</button></li>
    @else
      <li class="disabled" aria-disabled="true"><button type="submit" class="btn btn-success btn_quiz">Submit</button></li>
    @endif
  </ul>
@endif
