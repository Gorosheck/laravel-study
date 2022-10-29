
@if (session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif

@if (session()->get('user-verify'))
    <div class="alert alert-success">Нужно подтвердить свой емейл</div>
@endif
