@extends('layouts.app')

@section('title')
    Home
@endsection

@section('headerScript')
window.__INITIAL_STATE__ = "{!! addslashes(json_encode($atoms)) !!}";
@endsection

@section('content')
	<iframe-grid-component :atoms="state.data"></iframe-grid-component>
	<ul class="pagination justify-content-center" role="navigation">
        <li :class="{ disabled:!state.prev_page_url }" class="page-item" :aria-disabled="!state.prev_page_url" rel="previous" aria-label="&laquo; Previous"><a :href="state.prev_page_url" :aria-disabled="!state.prev_page_url" v-show="state.prev_page_url" class="page-link" rel="previous">&laquo;</a><span v-show="!state.prev_page_url" class="page-link" aria-hidden="true">&laquo;</span></li>

        <li v-if="state.last_page != 1" :class="{ active:state.current_page == 1 }" class="page-item" :aria-current="aria1"><a v-show="state.current_page != 1" :href="state.first_page_url" class="page-link">1</a><span v-show="state.current_page == 1" class="page-link">1</span></li><!-- More than 1 page exists -->
        <li v-else class="active page-item" aria-current="page"><span class="page-link">1</span></li><!-- Only 1 page exists -->

        <li v-show="state.last_page != 1" v-for="index in loopCounter" :key="index" class="page-item" :class="{ active:state.current_page == (index + 1) }"><a v-show="state.current_page != index + 1" class="page-link" :href="baseUrl + (index + 1)">@{{ index + 1 }}</a><span class="page-link" v-show="state.current_page == index + 1">@{{ index + 1 }}</span></li>

        <li v-if="state.last_page > 1" :class="{ active:state.current_page == state.last_page }" class="page-item" :aria-current="ariaLast"><a v-show="state.current_page != state.last_page" class="page-link" :href="state.last_page_url">@{{ state.last_page }}</a><span v-show="state.current_page == state.last_page" class="page-link">@{{ state.last_page }}</span></li><!-- Last Link Exists -->

        <li :class="{ disabled:!state.next_page_url }" class="page-item"><a class="page-link" aria-disabled="!state.next_page_url" :href="state.next_page_url" rel="next" aria-label="Next &raquo;" v-show="state.next_page_url">&raquo;</a><span v-show="!state.next_page_url" class="page-link" aria-hidden="true">&raquo;</span></li>
    </ul>
@endsection
