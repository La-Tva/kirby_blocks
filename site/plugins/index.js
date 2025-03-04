panel.plugin("cookbook/block-factory", {
    blocks: {
     card: {
        data() {
          return {
            text: "No text value"
          };
        },
        computed: {
          cardType() {
            return this.content.cardtype;
          },
          heading() {
            return (this.cardType === 'manual') ? this.content.heading : this.page.text;
          },
          image() {
            if(this.cardType === 'manual') {
              return this.content.image[0] || {};
            } else {
              return this.page.image || {}
            }
          },
          pageId() {
            return this.page ? this.page.id : '';
          },
          page() {
              return this.content.page[0] || {};
          },
        },
        watch: {
          "cardType": {
            handler (value) {
             if(value === 'page' && this.pageId) {
              this.$api.get('pages/' + this.pageId.replaceAll('/', '+')).then(page => {
                this.text = page.content.text.replace(/(<([^>]+)>)/gi, "") || this.text;
              });
             } else if(value === 'manual') {
               this.text = this.content.text || this.text;
             }
  
            },
            immediate: true
          },
          "page": {
            handler (value) {
             if(this.cardType === 'page' && this.pageId) {
              this.$api.get('pages/' + this.pageId.replaceAll('/', '+')).then(page => {
                this.text = page.content.text.replace(/(<([^>]+)>)/gi, "") || this.text;
              });
             } else if(value === 'manual') {
               this.text = this.content.text || this.text;
             }
            },
            immediate: true
          }
        },
        template: `
          <div @dblclick="open">
            <k-aspect-ratio
              class="k-block-type-card-image"
              cover="true"
              ratio="1/1"
            >
              <img
                v-if="image.url"
                :src="image.url"
                alt=""
              >
            </k-aspect-ratio>
            <h2 class="k-block-type-card-heading">{{ heading }}</h2>
            <div class="k-block-type-card-text">{{ text }}</div>
          </div>
        `
      },
    }
  });