<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item"><a class="nav-link" href="index.html">
                <div class="nav-icon"><i data-feather="anchor"></i></div>
                Dashboard
            </a></li>
        <li class="nav-title">Components</li>
        <li class="nav-item"><a class="nav-link" href="charts.html">
                <div class="nav-icon"><i data-feather="anchor"></i></div> Charts
            </a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <div class="nav-icon"><i data-feather="anchor"></i></div> Forms
            </a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="forms/form-control.html"><span class="nav-icon"><i
                                data-feather="anchor"></i></span> Form Control</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/select.html"><span class="nav-icon"><i
                                data-feather="anchor"></i></span> Select</a></li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
