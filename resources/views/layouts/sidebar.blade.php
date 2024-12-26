<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;position: fixed">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="list-unstyled ps-0">

      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Purchase Request
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
           Purchase Order
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Receiving Orders
        </a>
      </li>
       <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Stock Transfer
        </a>
      </li>
    </ul>
    <hr>
      <ul class="list-unstyled ps-0">

      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          <b>Tools</b>
        </a>
      </li>
       <li>
        <a href="{{ route('companies') }}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Company
        </a>
      </li>
      <li>
        <a href="{{ route('branch.index') }}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Branches
        </a>
      </li>
       <li>
        <a href="{{ route('suppliers.list') }}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Supplier
        </a>
      </li>
       <li>
        <a href="{{ route('list.items.page') }}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Items
        </a>
      </li>
       <li>
        <a href="{{ route('pricelevel.create')}}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Price Level
        </a>
      </li>
       <li>
        {{-- <a href="{{ route('unit-measure.index') }}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Unit of Measure
        </a>
      </li> --}}
       <li>
        <a href="{{ route('add.category.page')}}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
         Category
        </a>
      </li>
       <li>
        <a href="{{ route('list.class.page') }}" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Classification
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>

        </a>
      </li>
    </ul>
    <div class="dropdown">

    </div>
  </div>
