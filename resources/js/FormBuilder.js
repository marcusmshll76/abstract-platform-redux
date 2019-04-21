class FormBuilder {
    constructor( form_body ) {
        if( !form_body ) {
            console.error( 'No form body set.' );
        }

        this.form = form_body;
        this.step = 1;
    }

    get header() {
        return this.form.steps[this.stepIndex].header;
    }

    get description() {
        return this.form.steps[this.stepIndex].desc;
    }

    get stepIndex() {
        return this.step - 1;
    }

    nextStep() {
        this.step += 1;
    }

    buildBodyFromStepRoot( createElement ) {
        return this.generateBody( this.form.steps[this.stepIndex].body, createElement );
    }

    generateBody( root, createElement ) {
        const elements = root.map( el => {
            return this.getComponent( el, createElement );
        } );

        return createElement( 'div', { class: 'row' }, elements );
    }

    getComponent( fieldInfo, createElement ) {
        // Map the component to the appropriate element
        let el;
        switch( fieldInfo.type ) {
            case 'pane':
                el = 'Pane';
                break;
            case 'upload':
                el = 'SingleImageUpload';
                break;
            case 'row':
                el = 'Row';
                break;
            case 'text':
                el = 'TextField';
                break;
            case 'email':
                el = 'EmailField';
                break;
            default:
                el = 'UnknownComponent';
                break;
        }

        // Build the list of props that we want to pass to the component, omitting children ("fields")
        const propList = Object.keys( fieldInfo );
        const props = {};
        propList.forEach( prop => {
          if( prop != 'fields' ) {
            props[prop] = fieldInfo[prop];
          }  
        } );

        // Set a list of empty children to simplify evaluation later, if needed
        fieldInfo.fields = typeof( fieldInfo.fields ) == 'undefined' ? [] : fieldInfo.fields;

        // Render the given element
        return createElement( el,
          {
              props: props
          },
          fieldInfo.fields.map( field => this.getComponent( field, createElement ) )
        );
    }

}

module.exports = FormBuilder;