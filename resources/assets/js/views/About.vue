<template>
    <div class="content">
        <div class="layout">
            <h5>{{ $t('about.title') }}</h5>
            <div class="center-justified" v-html="$t('about.text')"></div>
        </div>
    </div>
</template>

<script>
    import event from '../classes/Event';

    export default {
    }
</script>
