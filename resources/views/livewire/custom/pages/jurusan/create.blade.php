<div class="container" style="margin-top: 9rem;min-height: 40rem;">

    <div class="row mb-2">
        <div class="col">
            <input class="form-control" wire:model='name' type="text" placeholder="Jurusan..." />
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="row mb-2">
        <div class="col" wire:ignore>
            <div id="toolbar-container"></div>
            <div wire:model='description' class="w-100 border form-control" id="my-editor" class="border border-1 rounded"
                style="height: 30rem">
            </div>
        </div>
        @error('description')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>


    <button wire:click='save' class="btn btn-primary" wire:loading.remove type="button"><i
            class="fas fa-save"></i> Save</button>
    <button class="btn btn-primary" type="button" disabled wire:loading.delay wire:target='save'>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
    </button>

    <a class="btn btn-outline-warning ms-1" href="{{ route('jurusan.index') }}" role="button"><i
            class="far fa-arrow-alt-circle-left"></i> Back</a>









    @section('scripts')
        <script>
            class MyUploadAdapter {
                constructor(loader) {
                    // The file loader instance to use during the upload.
                    this.loader = loader;
                }

                // Starts the upload process.
                upload() {
                    return this.loader.file
                        .then(file => new Promise((resolve, reject) => {
                            this._initRequest();
                            this._initListeners(resolve, reject, file);
                            this._sendRequest(file);
                        }));
                }

                // Aborts the upload process.
                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }

                // Initializes the XMLHttpRequest object using the URL passed to the constructor.
                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();

                    // Note that your request may look different. It is up to you and your editor
                    // integration to choose the right communication channel. This example uses
                    // a POST request with JSON as a data structure but your configuration
                    // could be different.
                    xhr.open('POST', "{{ route('upload-image') }}", true);
                    xhr.setRequestHeader('Accept', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.responseType = 'json';
                }

                // Initializes XMLHttpRequest listeners.
                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                    xhr.addEventListener('error', () => reject(genericErrorText));
                    xhr.addEventListener('abort', () => reject());
                    xhr.addEventListener('load', () => {
                        const response = xhr.response;

                        // This example assumes the XHR server's "response" object will come with
                        // an "error" which has its own "message" that can be passed to reject()
                        // in the upload promise.
                        //
                        // Your integration may handle upload errors in a different way so make sure
                        // it is done properly. The reject() function must be called when the upload fails.

                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }

                        // If the upload is successful, resolve the upload promise with an object containing
                        // at least the "default" URL, pointing to the image on the server.
                        // This URL will be used to display the image in the content. Learn more in the
                        // UploadAdapter#upload documentation.
                        resolve({
                            default: response.url
                        });
                    });

                    // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                    // properties which are used e.g. to display the upload progress bar in the editor
                    // user interface.
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', evt => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                // Prepares the data and sends the request.
                _sendRequest(file) {
                    // Prepare the form data.
                    const data = new FormData();

                    data.append('image', file);

                    // Important note: This is the right place to implement security mechanisms
                    // like authentication and CSRF protection. For instance, you can use
                    // XMLHttpRequest.setRequestHeader() to set the request headers containing
                    // the CSRF token generated earlier by your application.

                    // Send the request.
                    this.xhr.send(data);
                }
            }




            function SimpleUploadAdapterPlugin(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    // Configure the URL to the upload script in your back-end here!
                    return new MyUploadAdapter(loader);
                };
            }


            DecoupledEditor
                .create(document.querySelector('#my-editor'), {
                    extraPlugins: [SimpleUploadAdapterPlugin],
                    placeholder: "Write your description here...",

                })
                .then(editor => {
                    const toolbarContainer = document.querySelector('#toolbar-container');
                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);


                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });


            /**
             * function for uploading image
             * for plugin ckeditor.
             */
            function uploadImage(file) {
                const formData = new FormData();
                formData.append('image', file);
                return fetch("{{ route('upload-image', ['_token' => csrf_token()]) }}", {
                    method: 'POST',
                    body: formData
                    // get response into console log
                }).then(response => response.json());
            }
        </script>
    @endsection
</div>
