@include('partials.dashboard.head')
@include('partials.dashboard.sidebar')
@include('partials.dashboard.header')

<div class="container mt-4">
    <h1>Scan QR Code KTM Mahasiswa</h1>
    <div id="reader" style="width:320px;"></div>
    <div class="mt-3">
        <label for="nim">NIM Hasil Scan:</label>
        <input type="text" id="nim" class="form-control" readonly>
    </div>
    <form id="form-cari" class="mt-3" method="GET" action="{{ route('qrcode.cari') }}">
        <input type="hidden" name="nim" id="nim-hidden">
        <button type="submit" class="btn btn-primary" disabled id="btn-cari">Cek Data Mahasiswa</button>
    </form>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById('nim').value = decodedText;
        document.getElementById('nim-hidden').value = decodedText;
        document.getElementById('btn-cari').disabled = false;
    }
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
</script>

@include('partials.dashboard.footer') 