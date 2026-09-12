@if ($errors->any())
    <div class="alert alert-error">
        <strong>Dữ liệu chưa hợp lệ:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
