<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>401 — Unauthorized</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('manual_css/errors.css')}}">
</head>
<body>
  <div class="wrap">
    <div class="card">
      <div class="top">
        <span class="badge">401</span>
        <div>
          <h1>Unauthorized</h1>
          <p>You need to sign in to access this page.</p>
        </div>
      </div>

      <div class="grid">
        <div class="panel">
          <div class="code">ERROR_CODE: 401_UNAUTHORIZED</div>
          <p class="hint" style="margin-top:8px;">
            If you believe this is a mistake, try signing in again or contact the site admin.
          </p>
          <div class="actions">
            <a class="btn" href="javascript:location.reload()">
              ⟳ Reload
            </a>
            <a class="btn btn-ghost" href="javascript:history.back()">
              ← Go Back
            </a>
            <!-- Replace # with your login URL later -->
            {{-- <a class="btn btn-ghost" href="#">
              ⇢ Login
            </a> --}}
          </div>

        </div>

        <div class="ill">
          <div class="shield"></div>
        </div>
      </div>
    </div>

    <div class="foot">© {{ date('Y') }} — evvisa</div>
  </div>
</body>
</html>
