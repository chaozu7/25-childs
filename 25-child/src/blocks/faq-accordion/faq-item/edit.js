import { RichText, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export function EditItem({ attributes, setAttributes }) {

    const blockProps = useBlockProps({
        className: 'fz-faq-item-admin'
    });

    const { question, answer } = attributes;

    return (
        <div {...blockProps}>
            {/* Question */}
            <div className="faq-question-wrapper" style={{ marginBottom: '10px', borderBottom: '1px dashed #ccc' }}>
                <RichText
                    tagName="div"
                    className="fz-faq-title-admin"
                    value={question}
                    onChange={(val) => setAttributes({ question: val })}
                    placeholder={__('Write your question...', 'twentyfifthchild')}
                    allowedFormats={['core/bold', 'core/italic']}
                />
            </div>

            {/* Answer */}
            <div className="faq-answer-wrapper" style={{ padding: '10px', background: '#f9f9f9' }}>
                <RichText
                    tagName="div"
                    className="fz-faq-answer-admin"
                    value={answer}
                    onChange={(val) => setAttributes({ answer: val })}
                    placeholder={__('Write the answer here...', 'twentyfifthchild')}
                />
            </div>
        </div>
    );
}
