<div class="flex-shrink-0 p-3 ps-0 bg-info-subtle position-sticky vh-100 ms-0">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="10" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4 fw-semibold">Manpro Jenderal</span>
    </a>

    <ul class="list-unstyled">
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
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fs-5" data-bs-toggle="collapse" data-bs-target="#master-collapse" aria-expanded="false">
                Data Master
            </button>
            <div class="collapse {{ $active_data_master ? 'show' : '' }}" id="master-collapse">
                
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                    <li><a href="{{ route('client.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('client*') ? 'bg-primary text-white' : '' }}">
                        Tabel Client</a>
                    </li>
                    <li><a href="{{ route('satuan.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('satuan*') ? 'bg-primary text-white' : '' }}">
                        Tabel Satuan</a>
                    </li>
                    <li><a href="{{ route('item.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('item*') ? 'bg-primary text-white' : '' }}">
                        Tabel Item</a>
                    </li>
                    <li><a href="{{ route('bank.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('bank*') ? 'bg-primary text-white' : '' }}">
                        Tabel Bank</a>
                    </li>
                    <li><a href="{{ route('supplier.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('supplier*') ? 'bg-primary text-white' : '' }}">
                        Tabel Supplier</a>
                    </li>
                    <li><a href="{{ route('rekening.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('rekening*') ? 'bg-primary text-white' : '' }}">
                        Tabel Rekening</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fs-5" data-bs-toggle="collapse" data-bs-target="#pembelian-collapse" aria-expanded="false">
                Pembelian
            </button>
            <div class="collapse {{ $active_pembelian ? 'show' : '' }}" id="pembelian-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('pembelian.pembelian-index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('pembelian*') ? 'bg-primary text-white' : '' }}">
                        Tabel Pembelian</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fs-5" data-bs-toggle="collapse" data-bs-target="#proyek-collapse" aria-expanded="false">
                Proyek
            </button>
            <div class="collapse {{ $active_proyek ? 'show' : '' }}" id="proyek-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('proyek.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('proyek*') ? 'bg-primary text-white' : '' }}">
                        Tabel Proyek</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fs-5" data-bs-toggle="collapse" data-bs-target="#pembayaran-collapse" aria-expanded="false">
                Pembayaran
            </button>
            <div class="collapse  {{ $active_pembayaran ? 'show' : '' }}" id="pembayaran-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('invoice.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ (Request::is('invoice*') || Request::is('invoice-detail')) ? 'bg-primary text-white' : '' }}">
                        Tabel Invoice</a>
                    </li>
                    <li><a href="{{ route('kwitansi.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded fs-6 {{ Request::is('kwitansi*') ? 'bg-primary text-white' : '' }}">
                        Tabel Kwitansi</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fs-5" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
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
