<div class="form-group">
    <label for="name">Họ tên</label>
    <input id="name" name="name" type="text" value="{{ old('name', $sinhvien->name ?? '') }}" required maxlength="255">
</div>

<div class="form-group">
    <label for="age">Tuổi</label>
    <input id="age" name="age" type="number" value="{{ old('age', $sinhvien->age ?? '') }}" required min="1" max="150">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email', $sinhvien->email ?? '') }}" required maxlength="255">
</div>
