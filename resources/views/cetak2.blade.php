<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pendaftaran </title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {

            font-size: 12px;

        }

        hr {
            border-style: solid;
            border-width: thin;
            border-color: black;
        }

        body {
            margin-top: 30px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1055;
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 0.5rem;
            pointer-events: none;
        }

        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
            transform: translate(0, -50px);
        }

        @media (prefers-reduced-motion: reduce) {
            .modal.fade .modal-dialog {
                transition: none;
            }
        }

        .modal.show .modal-dialog {
            transform: none;
        }

        .modal.modal-static .modal-dialog {
            transform: scale(1.02);
        }

        .modal-dialog-scrollable {
            height: calc(100% - 1rem);
        }

        .modal-dialog-scrollable .modal-content {
            max-height: 100%;
            overflow: hidden;
        }

        .modal-dialog-scrollable .modal-body {
            overflow-y: auto;
        }

        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 0.125rem solid rgba(0, 0, 0, 0.2);
            border-radius: 0.75rem;
            outline: 0;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            width: 100vw;
            height: 100vh;
            background-color: #000;
        }

        .modal-backdrop.fade {
            opacity: 0;
        }

        .modal-backdrop.show {
            opacity: 0.5;
        }

        .modal-header {
            flex-shrink: 0;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 0.125rem solid #dee2e6;
            border-top-left-radius: 0.625rem;
            border-top-right-radius: 0.625rem;
        }

        .modal-header .btn-close {
            padding: 0.5rem 0.5rem;
            margin: -0.5rem -0.5rem -0.5rem auto;
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
        }

        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1rem;
        }

        .modal-footer {
            flex-wrap: wrap;
            flex-shrink: 0;
            align-items: center;
            justify-content: flex-end;
            padding: 0.75rem;
            border-top: 0.125rem solid #dee2e6;
            border-bottom-right-radius: 0.625rem;
            border-bottom-left-radius: 0.625rem;
        }

        .modal-footer>* {
            margin: 0.25rem;
        }
    </style>
    <br>
    <br>
    <div class="modal show fade" id="modal-vaksin">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset(\App\Models\Website::find(1)->puskesmas_image) }}" width="60px" />
                    <h3>{{ $puskesmas_nama }}</h3>
                    <h5 id="modal_vaksin_alamat" {{ $puskesmas_alamat }}></h5>
                    <h5 id="modal_vaksin_vaksin">{{ $vaksin_nama }}</h5>
                    <h5 id="modal_vaksin_nama">{{ $peserta_nama }}</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="modal_vaksin_NIK" class="modal_vaksin_NIK">
                    <h5>Nomor Pendaftaran</h5>
                    <h1 id="modal_vaksin_nomor">{{ $nomor_pendaftaran }}</h1>
                    <h3 id="modal_vaksin_tanggal">{{ $parse }}</h3>
                    <h5 id="modal_vaksin_sesi">{{ $vaksin_sesi }}</h5>

                </div>
                <div class="modal-footer text-center">
                    <p>Perhatian</p>
                    <p>Wajib membawa nomor antrian</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>