<x-layouts.app>
    <div class="text-center">
        <form method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="import_file" accept="text/csv">

            <div class="mt-5">
                <x-primary-button>Import</x-primary-button>
            </div>
        </form>
    </div>
</x-layouts.app>
