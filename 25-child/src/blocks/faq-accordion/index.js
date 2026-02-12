import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import Edit from './edit.js';
import Save from './save.js';
import { EditItem } from './faq-item/edit.js';
import { SaveItem } from './faq-item/save.js';

// FAQ Accordion
registerBlockType('fz/faq-accordion', {
    title: __('FAQ Accordion', 'twentyfifthchild'),
    category: 'text',
    icon: 'editor-ul',
    attributes: {
        heading: { type: 'string', default: 'Frequently Asked Questions' }
    },
    edit: Edit,
    save: Save,
});

//FAQ Item
registerBlockType('fz/faq-item', {
    title: __('FAQ Item', 'twentyfifthchild'),
    parent: ['fz/faq-accordion'],
    icon: 'plus',
    attributes: {
        question: { type: 'string', source: 'html', selector: '.fz-faq-title' },
        answer: { type: 'string', source: 'html', selector: '.fz-faq-answer' }
    },
    edit: EditItem,
    save: SaveItem,
});