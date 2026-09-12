@push('styles')
<style>
/* ---------- SIDEBAR ---------- */
    .sidebar {
      background-color: var(--mau-phu);
      color: #fff;
      padding: 20px 0;
      /* Cú pháp: flex: grow shrink basis
         0 0 240px = không giãn, không co, rộng đúng 240px */
      flex: 0 0 var(--rong-sidebar);
    }
    .sidebar h3 {
      font-size: 12px; text-transform: uppercase; letter-spacing: 1px;
      opacity: 0.7; padding: 0 20px; margin-bottom: 10px;
    }
    .menu-doc { list-style: none; margin-bottom: 24px; }
    .menu-doc a {
      display: block; color: #fff; text-decoration: none;
      padding: 10px 20px;
      border-left: 3px solid transparent;
      transition: all 0.2s;
    }
    .menu-doc a:hover {
      background-color: rgba(0,0,0,0.15);
      border-left-color: var(--mau-nhan);
      padding-left: 26px;
    }
    .menu-doc a.active {
      background-color: rgba(0,0,0,0.25);
      border-left-color: var(--mau-nhan);
      font-weight: 600;
    }
</style>
@endpush
<aside class="sidebar">
    <h3>Quản lý dữ liệu</h3>
    <ul class="menu-doc">
        <li><a href="{{ route('sinhvien.index') }}" class="{{ request()->routeIs('sinhvien.*') ? 'active' : '' }}">Sinh viên</a></li>
        <li><a href="{{ route('lophoc.index') }}" class="{{ request()->routeIs('lophoc.*') ? 'active' : '' }}">Lớp học</a></li>
    </ul>
    <h3>Thao tác nhanh</h3>
    <ul class="menu-doc">
        <li><a href="{{ route('sinhvien.create') }}">Thêm sinh viên</a></li>
        <li><a href="{{ route('lophoc.create') }}">Thêm lớp học</a></li>
    </ul>
</aside>
