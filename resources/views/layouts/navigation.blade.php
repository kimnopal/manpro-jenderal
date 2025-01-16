<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Data Master
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('client.index') }}">Tabel Client</a></li>
                        <li><a class="dropdown-item" href="{{ route('satuan.index') }}">Tabel Satuan</a></li>
                        <li><a class="dropdown-item" href="{{ route('item.index') }}">Tabel Item</a></li>
                        <li><a class="dropdown-item" href="{{ route('bank.index') }}">Tabel Bank</a></li>
                        <li><a class="dropdown-item" href="{{ route('supplier.index') }}">Tabel Supplier</a></li>
                        <li><a class="dropdown-item" href="{{ route('rekening.index') }}">Tabel Rekening</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
