<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

  <link rel="stylesheet" href="<?= base_url('assets/templates')?>/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/templates')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/templates')?>/dist/css/adminlte.min.css?v=3.2.0">
  <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwUmVnaXN0cmF0aW9uJTIwUGFnZSUyMiUyQyUyMnglMjIlM0EwLjE2NzM1NDMwMzE0NTMwNTMlMkMlMjJ3JTIyJTNBMTcwNyUyQyUyMmglMjIlM0E5NjQlMkMlMjJqJTIyJTNBODE2JTJDJTIyZSUyMiUzQTE3MTUlMkMlMjJsJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZhZG1pbmx0ZS5pbyUyRnRoZW1lcyUyRnYzJTJGcGFnZXMlMkZleGFtcGxlcyUyRnJlZ2lzdGVyLmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZhZG1pbmx0ZS5pbyUyRnRoZW1lcyUyRnYzJTJGJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS00MjAlMkMlMjJxJTIyJTNBJTVCJTVEJTdE"></script>
  <script nonce="854a330d-295f-41f4-a12f-4f263bf68b05">
    (function (w, d) {
      !function (bS, bT, bU, bV) {
        bS[bU] = bS[bU] || {};
        bS[bU].executed = [];
        bS.zaraz = {
          deferred: [],
          listeners: []
        };
        bS.zaraz.q = [];
        bS.zaraz._f = function (bW) {
          return async function () {
            var bX = Array.prototype.slice.call(arguments);
            bS.zaraz.q.push({
              m: bW,
              a: bX
            })
          }
        };
        for (const bY of ["track", "set", "debug"]) bS.zaraz[bY] = bS.zaraz._f(bY);
        bS.zaraz.init = () => {
          var bZ = bT.getElementsByTagName(bV)[0],
            b$ = bT.createElement(bV),
            ca = bT.getElementsByTagName("title")[0];
          ca && (bS[bU].t = bT.getElementsByTagName("title")[0].text);
          bS[bU].x = Math.random();
          bS[bU].w = bS.screen.width;
          bS[bU].h = bS.screen.height;
          bS[bU].j = bS.innerHeight;
          bS[bU].e = bS.innerWidth;
          bS[bU].l = bS.location.href;
          bS[bU].r = bT.referrer;
          bS[bU].k = bS.screen.colorDepth;
          bS[bU].n = bT.characterSet;
          bS[bU].o = (new Date).getTimezoneOffset();
          if (bS.dataLayer) for (const ce of Object.entries(Object.entries(dataLayer).reduce(((cf, cg) => ({
            ...cf[1],
            ...cg[1]
          })), {}))) zaraz.set(ce[0], ce[1], {
            scope: "page"
          });
          bS[bU].q = [];
          for (; bS.zaraz.q.length;) {
            const ch = bS.zaraz.q.shift();
            bS[bU].q.push(ch)
          }
          b$.defer = !0;
          for (const ci of [localStorage, sessionStorage]) Object.keys(ci || {}).filter((ck => ck.startsWith("_zaraz_"))).forEach((cj => {
            try {
              bS[bU]["z_" + cj.slice(7)] = JSON.parse(ci.getItem(cj))
            } catch {
              bS[bU]["z_" + cj.slice(7)] = ci.getItem(cj)
            }
          }));
          b$.referrerPolicy = "origin";
          b$.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bS[bU])));
          bZ.parentNode.insertBefore(b$, bZ)
        };
        ["complete", "interactive"].includes(bT.readyState) ? zaraz.init() : bS.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
  <style type="text/css">
    @font-face {
      font-weight: 400;
      font-style: normal;
      font-family: circular;

      src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Book.woff2') format('woff2');
    }

    @font-face {
      font-weight: 700;
      font-style: normal;
      font-family: circular;

      src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Bold.woff2') format('woff2');
    }
  </style>
</head>

<body class="register-page" style="min-height: 572.333px;">
  <div class="register-box">
    <div class="register-logo">
      <a href="<?= base_url('assets/templates')?>/index2.html"><b>Uang</b>.ku</a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Registerasi akun baru</p>
        <?php echo form_open('register'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name" value="<?php echo set_value('name'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="password_conf" value="<?php echo set_value('password_conf'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="registerButton">Register</button>
          </div>
        </div>
        <?php echo form_close(); ?>
        <div class="social-auth-links text-center">
        </div>
        <a href="login.html" class="text-center">saya sudah punya akun</a>
      </div>
    </div>
  </div>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const agreeTermsCheckbox = document.getElementById("agreeTerms");
    const registerButton = document.getElementById("registerButton");

    // Fungsi untuk mengaktifkan atau menonaktifkan tombol "Register" berdasarkan status checkbox
    function updateRegisterButtonState() {
      registerButton.disabled = !agreeTermsCheckbox.checked;
    }

    // Pemanggilan fungsi saat halaman dimuat dan setiap kali status checkbox berubah
    updateRegisterButtonState();
    agreeTermsCheckbox.addEventListener("change", updateRegisterButtonState);
  });
</script>

  <script src="<?= base_url('assets/templates')?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/templates')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/templates')?>/dist/js/adminlte.min.js?v=3.2.0"></script>

  <div id="loom-companion-mv3" ext-id="liecbddmkiiihnedobmlmillhodjkdmb">
    <section id="shadow-host-companion"></section>
  </div>
</body>

</html>
