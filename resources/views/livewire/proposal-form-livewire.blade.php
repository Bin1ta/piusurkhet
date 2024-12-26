<div class="container my-4">
    <div class="card p-4 shadow-sm">
        <h4 class="card-title mb-3"> फारम भर्नुहोस्</h4>
        <div class="mb-3">
            <h5><strong>{{ request()->language == 'en' ? $document['title_en'] : $document['title'] }}को फारम</strong>
            </h5>
        </div>
        <form wire:submit.prevent="submit">
            <div class="row g-3">

                <div class="col-md-4">
                    <label for="name" class="form-label"> नाम</label>
                    <input type="text" id="name" class="form-control" placeholder="नाम" wire:model="form.name">
                </div>

                <div class="col-md-4">
                    <label for="address" class="form-label">ठेगाना</label>
                    <input type="text" id="address" class="form-control" placeholder="ठेगाना"
                        wire:model="form.address">
                </div>


                <div class="col-md-4">
                    <label for="phone" class="form-label">सम्पर्क नं</label>
                    <input type="text" id="phone" class="form-control" placeholder="फोन नं"
                        wire:model="form.phone">
                </div>


                <div class="col-md-4">
                    <label for="email" class="form-label">इमेल</label>
                    <input type="email" id="email" class="form-control" placeholder="इमेल"
                        wire:model="form.email">
                </div>


                <div class="col-md-4">
                    <label for="spouse_name" class="form-label">पति/पत्नीको नाम</label>
                    <input type="spouse_name" id="spouse_name" class="form-control" placeholder="पति/पत्नीको नाम"
                        wire:model="form.spouse_name">
                </div>




                <fieldset class="col-md-12 mt-4">
                    <legend><strong> आवश्यक कागजातहरु</strong><small> </small></legend>

                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-xs btn-outline-info"
                            wire:click.prevent="fileArrayIncrement">
                            <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </button>
                    </div>

                    <fieldset class="bg-light p-3 rounded">
                        <div id="documents">
                            @foreach ($form['files'] ?? [] as $key => $file)
                                <div class="row border-bottom mb-2">
                                    <!-- File Title -->
                                    <div class="col-md-5 mb-2">
                                        <label for="form.files.{{ $key }}.file_name"
                                            class="form-label">शीर्षक*</label>
                                        <input type="text"
                                            class="form-control @error('form.files.' . $key . '.file_name') is-invalid @enderror"
                                            wire:model="form.files.{{ $key }}.file_name" placeholder="शीर्षक">
                                        @error("form.files.$key.file_name")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- File Upload -->
                                    <div class="col-md-6 mb-2">
                                        <label for="form.files.{{ $key }}.file" class="form-label">डकुमेन्ट
                                            *</label>
                                        <input type="file"
                                            class="form-control @error('form.files.' . $key . '.file') is-invalid @enderror"
                                            wire:model="form.files.{{ $key }}.file">
                                        <div wire:loading wire:target="form.files.{{ $key }}.file">Uploading...
                                        </div>
                                        @error("form.files.$key.file")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Remove Button -->
                                    <div class="col-md-1 mb-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            wire:click.prevent="fileArrayDecrement({{ $key }})">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                </fieldset>
            </div>


            <div class="mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>


        <!-- Success Message -->
        @if (session()->has('message'))
            <div id="success-message" class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const message = document.getElementById('success-message');
        if (message) {
            setTimeout(function() {
                message.style.display = 'none';
            }, 5000); // 5 seconds
        }
    });
</script>
