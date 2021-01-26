<template>
    <v-card
        v-bind="$attrs"
        :class="classes"
        class="v-card--material pa-3"
    >
        <div class="d-flex grow flex-wrap">
            <v-avatar class="mx-auto v-card--material__avatar elevation-6"
                v-if="avatar"
                size="128"
                color="grey"
            >
                <v-img :src="avatar" />
            </v-avatar>

            <v-sheet class="text-start v-card--material__heading mb-n6" style="position: relative; top: -40px; transition: .3s ease; z-index: 1"
                v-else
                :class="[
                    {
                      'pa-7': !$slots.image
                    }, 
                    'rounded'
                    ]"
                :color="color"
                :max-height="icon ? 90 : undefined"
                :width="icon ? 'auto' : '100%'"
                elevation="6"
                dark
            >
                <slot
                    :class="`rounded`"
                    v-if="$slots.heading"
                    name="heading"
                >
                </slot>

                <slot
                    v-else-if="$slots.image"
                    name="image"
                >
                </slot>

                <div class="display-1 font-weight-light"
                    v-else-if="title && !icon"
                    v-text="title"
                >
                </div>

                <v-icon
                    v-else-if="icon"
                    size="32"
                    v-text="icon"
                >
                </v-icon>

                <div class="headline font-weight-thin"
                    v-if="text"
                    v-text="text"
                >
                </div>
            </v-sheet>

            <div class="ml-6"
                v-if="$slots['after-heading']"
            >
                <slot 
                    name="after-heading" 
                >
                </slot>
            </div>

            <div class="ml-4"
                v-else-if="icon && title"
            >
                <div
                    class="card-title font-weight-light"
                    v-text="title"
                >
                </div>
            </div>
        </div>

        <slot></slot>

        <template v-if="$slots.actions">
            <v-divider class="mt-2" />

            <v-card-actions class="pb-0">
                <slot name="actions" />
            </v-card-actions>
        </template>
    </v-card>
</template>

<script>
    export default {
        name: 'MaterialCard',

        props: {
            avatar: {
                type: String,
                default: '',
            },
            color: {
                type: String,
                default: 'success',
            },
            icon: {
                type: String,
                default: undefined,
            },
            image: {
                type: Boolean,
                default: false,
            },
            text: {
                type: String,
                default: '',
            },
            title: {
                type: String,
                default: '',
            },
        },
        computed: {
            classes () {
                return {
                    'v-card--material--has-heading': this.hasHeading,
                }
            },
            hasHeading () {
                return Boolean(this.$slots.heading || this.title || this.icon)
            },
            hasAltHeading () {
                return Boolean(this.$slots.heading || (this.title && this.icon))
            },
        },
    }
</script>

