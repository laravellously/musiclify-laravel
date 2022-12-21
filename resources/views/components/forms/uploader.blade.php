@props(['id', 'extensions', 'accept', 'size', 'max', 'model'])

<div x-data="window.uploader_{{ $id }}" x-init="initialize" x-cloak>
    <input type="file" name="{{ $id }}" id="{{ $id }}" accept="{{ $accept }}" multiple>
</div>

@pushOnce('scripts')
    {{-- Uploader Plugin --}}
    <script src="{{ url('public/js/plugins/uploader/js/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
@endPushOnce

@pushOnce('styles')
    {{-- Uploader fonts --}}
    <link href="{{ url('public/js/plugins/uploader/font/font-fileuploader.css') }}" rel="stylesheet">

    {{-- Uploader styles --}}
    <link href="{{ url('public/js/plugins/uploader/css/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ url('public/js/plugins/uploader/css/jquery.fileuploader-theme-thumbnails.css') }}" media="all" rel="stylesheet">
@endPushOnce

@push('scripts')

    {{-- AlpineJS --}}
    <script>
        function uploader_{{ $id }}() {
            return {

                files: [],

                // Initialize
                initialize() {

                    const _this = this;

                    $('#{{ $id }}').fileuploader({
                        extensions : @js($extensions),
                        fileMaxSize: @js($size),
                        limit      : @js($max),
                        changeInput: ' ',
                        theme      : 'thumbnails',
                        enableApi  : true,
                        addMore    : true,
                        thumbnails : {
                            box: '<div class="fileuploader-items">' +
                                    '<ul class="fileuploader-items-list">' +
                                        '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                                    '</ul>' +
                                '</div>',
                            item: '<li class="fileuploader-item">' +
                                    '<div class="fileuploader-item-inner">' +
                                        '<div class="type-holder">${extension}</div>' +
                                        '<div class="actions-holder">' +
                                            '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                        '</div>' +
                                        '<div class="thumbnail-holder">' +
                                            '${image}' +
                                            '<span class="fileuploader-action-popup"></span>' +
                                        '</div>' +
                                        '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                                        '<div class="progress-holder">${progressBar}</div>' +
                                    '</div>' +
                                '</li>',
                            item2: '<li class="fileuploader-item">' +
                                    '<div class="fileuploader-item-inner">' +
                                        '<div class="type-holder">${extension}</div>' +
                                        '<div class="actions-holder">' +
                                            '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                                            '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                        '</div>' +
                                        '<div class="thumbnail-holder">' +
                                            '${image}' +
                                            '<span class="fileuploader-action-popup"></span>' +
                                        '</div>' +
                                        '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                                        '<div class="progress-holder">${progressBar}</div>' +
                                    '</div>' +
                                '</li>',
                            startImageRenderer: true,
                            canvasImage: false,
                            _selectors: {
                                list: '.fileuploader-items-list',
                                item: '.fileuploader-item',
                                start: '.fileuploader-action-start',
                                retry: '.fileuploader-action-retry',
                                remove: '.fileuploader-action-remove'
                            },
                            onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                    api = $.fileuploader.getInstance(inputEl.get(0));
                                
                                plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();
                                
                                if(item.format == 'image') {
                                    item.html.find('.fileuploader-item-icon').hide();
                                }
                            },
                            onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                    api = $.fileuploader.getInstance(inputEl.get(0));
                            
                                html.children().animate({'opacity': 0}, 200, function() {
                                    html.remove();
                                    
                                    if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                                        plusInput.show();
                                });
                            }
                        },
                        dragDrop   : {
                            container: '.fileuploader-thumbnails-input'
                        },
                        afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                api = $.fileuploader.getInstance(inputEl.get(0));
                        
                            plusInput.on('click', function() {
                                api.open();
                            });
                            
                            api.getOptions().dragDrop.container = plusInput;
                        },

                        onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {

                            // Get file
                            const file = item.file;

                            @this.upload('{{ $model }}', file, (uploadedFilename) => {

                                // Set file details
                                const details = {
                                    local : item.name,
                                    server: uploadedFilename
                                }

                                // Add to files
                                _this.files.push(details);
                                
                            }, () => {

                                // Get api
                                api = $.fileuploader.getInstance(inputEl.get(0));

                                // Remove item
                                api.remove(item);

                                // Error
                                window.toast("{{ __('messages.t_error_while_uploading_your_file') }}", 'error');
                            });
                            
                        },

                        // Remove file
                        onRemove: function(item) {

                            // Get file name from server
                            const data = _this.files.find(file => file.local === item.name);

                            // Remove file
                            @this.removeUpload('{{ $model }}', data.server, () => {
                                // Success
                                window.toast("{{ __('messages.t_file_has_been_successfully_deleted') }}", 'success');
                            });

                        }

                    });
                }

            }
        }
        window.uploader_{{ $id }} = uploader_{{ $id }}();
    </script>

@endpush