import { registerBlockType } from '@wordpress/blocks'
import { RichText, useBlockProps, InspectorControls } from '@wordpress/block-editor'
import { __ } from '@wordpress/i18n'
import { ColorPalette, PanelBody } from '@wordpress/components'
import block from './block.json'
import './main.css'

registerBlockType(block.name, {
    edit({ attributes, setAttributes }) {
        const { content, content_color, faqItems } = attributes;
        const blockProps = useBlockProps();

        // updates q&a
        const updateItem = (index, key, value) => {
            const newItems = [...faqItems];
            newItems[index][key] = value;
            setAttributes({ faqItems: newItems });
        };

        // remove
        const removeItem = (index) => {
            const newItems = faqItems.filter((_, i) => i !== index);
            setAttributes({ faqItems: newItems });
        };

        // add
        const addItem = () => {
            setAttributes({ faqItems: [...faqItems, { question: '', answer: '' }] });
        };

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Colors', 'twentyfifthchild')}>
                        <ColorPalette
                            colors={[
                                { name: 'Gray', color: '#3C3C3C' },
                                { name: 'Purple', color: '#666666' }
                            ]}
                            value={content_color}
                            onChange={newVal => setAttributes({ content_color: newVal })}
                        />
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <RichText
                        tagName="h2"
                        className="accordion-faq-title"
                        style={{ color: content_color }}
                        value={content}
                        onChange={val => setAttributes({ content: val })}
                        placeholder={__('Tytuł sekcji FAQ', 'twentyfifthchild')}
                    />

                    <div className="faq-admin-list">
                        {faqItems.map((item, index) => (
                            <div key={index} className="faq-admin-item" style={{
                                border: '1px solid #ddd',
                                padding: '15px',
                                marginBottom: '10px',
                                position: 'relative',
                                borderRadius: '4px'
                            }}>
                                {/* remove button*/}
                                <button
                                    onClick={() => removeItem(index)}
                                    style={{
                                        position: 'absolute',
                                        top: '5px',
                                        right: '5px',
                                        background: '#cc0000',
                                        color: '#fff',
                                        border: 'none',
                                        borderRadius: '3px',
                                        cursor: 'pointer',
                                        fontSize: '10px',
                                        padding: '2px 6px'
                                    }}
                                >
                                    {__('Remove', 'twentyfifthchild')}
                                </button>

                                <RichText
                                    tagName="div"
                                    className="faq-q"
                                    style={{ fontWeight: 'bold', marginBottom: '15px', paddingRight: '40px' }}
                                    value={item.question}
                                    onChange={val => updateItem(index, 'question', val)}
                                    placeholder={__('Your question...', 'twentyfifthchild')}
                                />
                                <RichText
                                    tagName="div"
                                    className="faq-a"
                                    value={item.answer}
                                    onChange={val => updateItem(index, 'answer', val)}
                                    placeholder={__('Your answer...', 'twentyfifthchild')}
                                />
                            </div>
                        ))}

                        <button
                            onClick={addItem}
                            style={{
                                marginTop: '10px',
                                padding: '8px 15px',
                                background: '#007cba',
                                color: '#white',
                                border: 'none',
                                borderRadius: '4px',
                                cursor: 'pointer'
                            }}
                        >
                            {__('+ Add another one', 'twentyfifthchild')}
                        </button>
                    </div>
                </div>
            </>
        );
    },
    save({ attributes }) {
        const { content, content_color, faqItems } = attributes;
        const blockProps = useBlockProps.save();

        return (
            <div {...blockProps}>
                {/* heading */}
                <RichText.Content tagName="h2" value={content} style={{ color: content_color }} />

                {/* accordion */}
                <div className="faq-wrapper">
                    {faqItems.map((item, index) => (
                        <details key={index} className="faq-item">
                            <summary className="faq-q">
                                <RichText.Content value={item.question} />
                            </summary>
                            <div className="faq-a">
                                <RichText.Content value={item.answer} />
                            </div>
                        </details>
                    ))}
                </div>
            </div>
        );
    }
});