<div class="ps-3 py-4" style="width: 230px;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center justify-content-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        {{-- <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg> --}}
        <span class="fs-5 fw-semibold text-center">Manpro Jenderal</span>
    </a>
    <ul class="list-unstyled ps-0">
        @php
            $active_data_master = Request::is('client*') ||
                            Request::is('item*') ||
                            Request::is('satuan*') ||
                            Request::is('bank*') ||
                            Request::is('supplier*') ||
                            Request::is('rekening*');

            $active_pembelian = Request::is('pembelian*');

            $active_proyek = Request::is('proyek*');

            $active_pembayaran = Request::is('kwitansi*') ||
                                 Request::is('invoice*') ||
                                 Request::is('invoice-detail*');
        @endphp
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#master-collapse" aria-expanded="false">
                Data Master
            </button>
            <div class="collapse {{ $active_data_master ? 'show' : '' }}" id="master-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('client.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Client</a></li>
                    <li><a href="{{ route('satuan.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Satuan</a></li>
                    <li><a href="{{ route('item.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Item</a></li>
                    <li><a href="{{ route('bank.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Bank</a></li>
                    <li><a href="{{ route('supplier.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Supplier</a></li>
                    <li><a href="{{ route('rekening.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Rekening</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pembelian-collapse" aria-expanded="false">
                Pembelian
            </button>
            <div class="collapse {{ $active_pembelian ? 'show' : '' }}" id="pembelian-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('pembelian.pembelian-index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Pembelian</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#proyek-collapse" aria-expanded="false">
                Proyek
            </button>
            <div class="collapse {{ $active_proyek ? 'show' : '' }}" id="proyek-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('proyek.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Proyek</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pembayaran-collapse" aria-expanded="false">
                Pembayaran
            </button>
            <div class="collapse {{ $active_pembayaran ? 'show' : '' }}" id="pembayaran-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('invoice.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Invoice</a></li>
                    <li><a href="{{ route('kwitansi.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Tabel Kwitansi</a></li>
                </ul>
            </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('profile.edit') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
                    <li><form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @method('post')
                        @csrf
                    </form>
                    <a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded" onclick="document.getElementById('logoutForm').submit();">Logout</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
