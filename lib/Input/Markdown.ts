import EasyMDE   from 'easymde';
import { Field } from './Field';

export class Markdown extends Field {

    EasyMDE: typeof EasyMDE;
    easyMDE: EasyMDE;
    defaults = {
        EasyMDE: {},
    };

    protected async load() {
        // @ts-ignore
        await import('../../resources/scss/inputs/markdown.scss' );
        this.EasyMDE = (await import('easymde')).default;
        this.easyMDE = new this.EasyMDE({
            element: this.element,
            ...this.options.EasyMDE,
        });
    }
}
