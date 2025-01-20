<x-app-layout>    
    <div class="mt-3">    
        <h4>Tambah Kwitansi</h4>    
        <form action="{{ route('kwitansi.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25" id="kwitansiForm">    
            @csrf    
            <label for="client" class="form-label">Client:</label>    
            <input type="text" name="client" class="form-control mb-2" required>    
    
            <label for="total" class="form-label">Total:</label>    
            <input type="number" name="total" class="form-control mb-2" required>    
    
            <label for="tujuan" class="form-label">Tujuan:</label>    
            <input type="text" name="tujuan" class="form-control mb-2" required>    
    
            <label for="tanggal" class="form-label">Tanggal:</label>    
            <input type="date" name="tanggal" class="form-control mb-2" required>    
    
            <button class="btn btn-success mt-3" type="submit" id="submitButton" disabled>    
                <i class="fa-solid fa-save"></i> Simpan    
            </button>    
        </form>    
    </div>    
  
    <script>  
        // Fungsi untuk memeriksa apakah semua input yang diperlukan terisi  
        function checkInputs() {  
            const inputs = document.querySelectorAll('#kwitansiForm input[required]');  
            const submitButton = document.getElementById('submitButton');  
            let allFilled = true;  
  
            inputs.forEach(input => {  
                if (!input.value) {  
                    allFilled = false;  
                }  
            });  
  
            // Aktifkan atau nonaktifkan tombol berdasarkan status input  
            submitButton.disabled = !allFilled;  
        }  
  
        // Tambahkan event listener untuk setiap input  
        const inputs = document.querySelectorAll('#kwitansiForm input[required]');  
        inputs.forEach(input => {  
            input.addEventListener('input', checkInputs);  
        });  
    </script>  
</x-app-layout>  
