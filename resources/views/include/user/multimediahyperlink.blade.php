media/{{ $articles->id }}-{{ date('d-m', strtotime($articles->publish)) }}-{{ str_replace(' ', '-', $articles->title) }}

