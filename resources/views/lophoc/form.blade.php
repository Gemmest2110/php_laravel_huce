<div class="form-group">
    <label for="tenlop">Tên lớp</label>
    <input id="tenlop" name="tenlop" type="text" value="{{ old('tenlop', $lophoc->tenlop ?? '') }}" required maxlength="255">
</div>

<div class="form-group">
    <label for="siso">Sĩ số</label>
    <input id="siso" name="siso" type="number" value="{{ old('siso', $lophoc->siso ?? '') }}" required min="1">
</div>

<div class="form-group">
    <label for="giaovien">Giáo viên</label>
    <input id="giaovien" name="giaovien" type="text" value="{{ old('giaovien', $lophoc->giaovien ?? '') }}" required maxlength="255">
</div>
