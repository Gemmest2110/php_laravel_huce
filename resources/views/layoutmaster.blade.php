<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'HUCE.Web')</title>
  <style>
    /* ==========================================================
       PHIÊN BẢN FLEXBOX — cùng một layout, kỹ thuật khác
       Ý tưởng: lồng 2 tầng flex
         Tầng 1 (dọc):  header  →  .than-trang  →  footer
         Tầng 2 (ngang): sidebar  →  main
       ========================================================== */
    :root {
      --mau-chinh:    #3d2b56;   /* tím than */
      --mau-phu:      #55407a;
      --mau-nhan:     #f2b544;   /* vàng nghệ */
      --mau-nen:      #f7f5fa;
      --mau-vien:     #e3dfea;
      --rong-sidebar: 240px;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
      font-size: 15px;
      line-height: 1.6;
      color: #2b2b2b;
      background-color: var(--mau-nen);

      /* Tầng 1: xếp các khối theo CHIỀU DỌC */
      display: flex;
      flex-direction: column;
      min-height: 100vh;   /* để footer luôn chạm đáy */
    }

    /* ---------- THÂN TRANG ---------- */
    .than-trang {
      /* Tầng 2: xếp sidebar và main theo CHIỀU NGANG */
      display: flex;
      /* flex: 1 -> khối này "ăn" hết chỗ trống còn lại theo chiều dọc,
         nhờ đó footer bị đẩy xuống đáy màn hình */
      flex: 1;
    }

    /* ---------- MAIN ---------- */
    .main {
      /* flex: 1 -> chiếm toàn bộ chiều ngang còn lại
         min-width: 0 -> chống lỗi nội dung dài làm tràn khung
         (lỗi kinh điển khi học Flexbox, nhớ nhắc sinh viên) */
      flex: 1;
      min-width: 0;
      padding: 20px;
    }
    .main h1 { font-size: 26px; color: var(--mau-chinh); margin-bottom: 6px; }
    .main .mo-ta { color: #7a7290; margin-bottom: 20px; }

    .noi-dung {
      background-color: #fff;
      border: 1px solid var(--mau-vien);
      border-radius: 6px;
      padding: 22px;
    }
    .noi-dung h2 {
      font-size: 18px; color: var(--mau-chinh); margin-bottom: 10px;
      padding-bottom: 8px;
      border-bottom: 2px solid var(--mau-nhan);
      display: inline-block;
    }
    .noi-dung p { margin-bottom: 12px; }
    .noi-dung ul { margin: 0 0 12px 22px; }
    .noi-dung code {
      background-color: #efebf5; padding: 2px 6px; border-radius: 3px;
      font-family: Consolas, monospace; font-size: 13px; color: #8a4b1f;
    }

    .toolbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 18px; }
    .toolbar h2 { margin: 0; border: 0; padding: 0; }
    .btn { display: inline-block; padding: 9px 15px; border: 0; border-radius: 4px; text-decoration: none; cursor: pointer; font: inherit; }
    .btn-primary { color: #fff; background: var(--mau-phu); }
    .btn-primary:hover { background: var(--mau-chinh); }
    .btn-secondary { color: var(--mau-chinh); background: #efebf5; }
    .table-wrapper { overflow-x: auto; }
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th, .data-table td { padding: 11px; text-align: left; border-bottom: 1px solid var(--mau-vien); }
    .data-table th { color: #fff; background: var(--mau-phu); }
    .data-table tbody tr:hover { background: #f7f5fa; }
    .actions { display: flex; align-items: center; gap: 10px; white-space: nowrap; }
    .actions form { display: inline; margin: 0; }
    .actions a, .link-danger { border: 0; padding: 0; background: none; color: var(--mau-phu); text-decoration: underline; cursor: pointer; font: inherit; }
    .link-danger { color: #b42318; }
    .empty-state { text-align: center !important; color: #7a7290; }
    .alert { padding: 12px 14px; margin-bottom: 16px; border-radius: 4px; }
    .alert-success { color: #166534; background: #dcfce7; }
    .alert-error { color: #991b1b; background: #fee2e2; }
    .alert ul { margin: 6px 0 0 20px; }
    .form-card { max-width: 620px; }
    .form-group { margin-bottom: 16px; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: var(--mau-chinh); }
    .form-group input { width: 100%; padding: 10px 12px; border: 1px solid var(--mau-vien); border-radius: 4px; font: inherit; }
    .form-group input:focus { outline: 2px solid var(--mau-nhan); border-color: transparent; }
    .form-actions { display: flex; gap: 10px; margin-top: 20px; }
    .detail-list { max-width: 620px; }
    .detail-list div { display: grid; grid-template-columns: 140px 1fr; border-bottom: 1px solid var(--mau-vien); padding: 11px 0; }
    .detail-list dt { font-weight: 600; color: var(--mau-chinh); }
    .pagination-wrapper { margin-top: 18px; }

    /* ---------- RESPONSIVE ----------
       Với Flexbox phải đổi flex-direction của .than-trang từ row sang
       column, đồng thời chỉnh lại flex-basis của sidebar. So với Grid
       (chỉ cần vẽ lại grid-template-areas) thì phức tạp hơn một chút. */
    @media (max-width: 768px) {
      .header { flex-direction: column; align-items: flex-start; }

      .than-trang { flex-direction: column; }

      .sidebar {
        flex: 0 0 auto;      /* bỏ chiều rộng cố định */
        width: 100%;
        padding: 12px 0;
      }
      .menu-doc { display: flex; flex-wrap: wrap; margin-bottom: 0; }
      .menu-doc a {
        border-left: none;
        border-bottom: 3px solid transparent;
        padding: 8px 14px;
      }
      .menu-doc a:hover { padding-left: 14px; }
      .toolbar { align-items: flex-start; flex-direction: column; }
      .actions { align-items: flex-start; flex-direction: column; }
      .detail-list div { grid-template-columns: 1fr; gap: 4px; }
    }
  </style>

</head>

<body>
    @include('partial.header')

    <div class="than-trang">
    @include('partial.sidebar')
    <main class="main">
      <h1 class="tieu-de">
        @yield('title')
      </h1>
      <p class="mo-ta">@yield('description')</p>

      <article class="noi-dung">
            @yield('content')
      </article>
    </main>
  </div>
      @include('partial.footer')

@stack('styles')

</body>
</html>
