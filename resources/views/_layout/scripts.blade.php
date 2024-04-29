<!-- Vendor Scripts Start -->
<script src="/js/vendor/jquery-3.5.1.min.js"></script>
<script src="/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/js/vendor/OverlayScrollbars.min.js"></script>
<script src="/js/vendor/autoComplete.min.js"></script>
<script src="/js/vendor/clamp.min.js"></script>
<script src="/icon/acorn-icons.js"></script>
<script src="/icon/acorn-icons-commerce.js"></script>
<script src="/icon/acorn-icons-interface.js"></script>
<script src="/icon/acorn-icons-learning.js"></script>
<script src="/icon/acorn-icons-medical.js"></script>
<script src="https://kit.fontawesome.com/edbbdf8888.js" crossorigin="anonymous"></script>
@yield('js_vendor')
<!-- Vendor Scripts End -->
<!-- Template Base Scripts Start -->
<script src="/js/base/helpers.js"></script>
<script src="/js/base/globals.js"></script>
<script src="/js/base/nav.js"></script>
<script src="/js/base/search.js"></script>
<script src="/js/base/settings.js"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->
@yield('js_page')
<script src="/js/common.js"></script>
<script src="/js/scripts.js"></script>
@if (!empty(session('role_page')))
    <script src="/js/pages/layout/horizontal.js"></script>
@else
    <script src="/js/pages/layout/vertical.js"></script>
@endif
<!-- Page Specific Scripts End -->