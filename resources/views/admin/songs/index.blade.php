@extends('admin.layouts.app')
@section('title', 'Admin Home')
@section('style')
    <style>
        .display {
            text-align: center;
            /* Center-aligns text in the table */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            /* Padding for pagination buttons */
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">{{ __('Song List') }}</h3>
            @if($createBtnShow =='1')
            <a href="{{ route('admin.songs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                {{ __('Create Song') }}</a>
                @endif
        </div>

        <!-- DevExtreme DataGrid container -->
        <table id="songsTable" class="display text-center" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('English Title') }}</th>
                    <th>{{ __('Lyrics English') }}</th>
                    <th>{{ __('Gujarati Title') }}</th>
                    <th>{{ __('Lyrics Gujarati') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@section('script')
    <script>
        const deleteBtn = @json($deleteBtn);

        $(document).ready(function() {
            $('#songsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.songs.index') }}',
                columns: [{
                        data: 'song_code',
                        name: 'song_code',
                        orderable: false,
                    },
                    {
                        data: 'title_en',
                        name: 'title_en',
                        orderable: false,
                    },
                    {
                        data: 'lyrics_en',
                        name: 'lyrics_en',
                        orderable: false,
                    },
                    {
                        data: 'title_gu',
                        name: 'title_gu',
                        orderable: false,
                    },
                    {
                        data: 'lyrics_gu',
                        name: 'lyrics_gu',
                        orderable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let actionHtml = `
                            <a href="{{ url('admin/songs') }}/${row.song_code}" class="btn btn-sm btn-info" data-toggle="tooltip" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/admin/songs/${row.song_code}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        `;

                            // Conditionally add the delete button if deleteBtn is 1
                            if (deleteBtn === '1') {
                                actionHtml += `
                                <form action="{{ url('admin/songs') }}/${row.song_code}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            `;
                            }

                            return actionHtml;
                        }
                    }
                ],
                columnDefs: [{
                        targets: 2, // index of the lyrics_en column
                        visible: false,
                        searchable: true // still searchable even if hidden
                    },
                    {
                        targets: 4, // index of the lyrics_gu column
                        visible: false,
                        searchable: true // still searchable even if hidden
                    }
                ],

                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf'
                ]
            });

            // Initialize tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection


{{-- SET @max_id := (SELECT MAX(id) FROM songs);

INSERT INTO songs (id, title_en, lyrics_en, title_gu, lyrics_gu)
    SELECT @max_id + ROW_NUMBER() OVER (), title_en, lyrics_en, title_gu, lyrics_gu
    FROM (SELECT title_en, lyrics_en, title_gu, lyrics_gu FROM songs WHERE id = 1) AS base
    CROSS JOIN (SELECT @rownum := @rownum + 1 AS rn FROM (SELECT @rownum := 0) AS r, songs LIMIT 50000) AS numbers; --}}
