import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

const Edit = (props) => {
    const { attributes, setAttributes } = props;
    const { heading, faqs } = attributes;
    const blockProps = useBlockProps();

    const onChangeHeading = (selectedHeading) => setAttributes({ heading: selectedHeading });

    const onAddFaq = () => {
        const newFaqs = [...faqs, { faqQuestion: '', faqAnswer: '' }];
        setAttributes({ faqs: newFaqs });
    };

    const onRemoveFaq = (index) => {
        const newFaqs = faqs.filter((_, i) => i !== index);
        setAttributes({ faqs: newFaqs });
    };

    const updateFaq = (index, key, value) => {
        const newFaqs = [...faqs];
        newFaqs[index][key] = value;
        setAttributes({ faqs: newFaqs });
    };

    return (
        <section {...blockProps}>
            <div className="faq-wrapper-admin">
                <RichText
                    tagName="h2"
                    value={heading}
                    onChange={onChangeHeading}
                    placeholder={__('Enter Heading...', 'twentyfifthchild')}
                />
                <div className="faq-content-admin">
                    {faqs.map((faq, index) => (
                        <div key={index} className="faq-item-admin" style={{ border: '1px solid #ccc', padding: '10px', marginBottom: '10px' }}>
                            <RichText
                                tagName="h4"
                                value={faq.faqQuestion}
                                onChange={(val) => updateFaq(index, 'faqQuestion', val)}
                                placeholder={__('Question...', 'twentyfifthchild')}
                            />
                            <RichText
                                tagName="p"
                                value={faq.faqAnswer}
                                onChange={(val) => updateFaq(index, 'faqAnswer', val)}
                                placeholder={__('Answer...', 'twentyfifthchild')}
                            />
                            <Button isDestructive onClick={() => onRemoveFaq(index)}>
                                {__('Remove', 'twentyfifthchild')}
                            </Button>
                        </div>
                    ))}
                    <Button variant="primary" onClick={onAddFaq}>
                        {__('Add FAQ Item', 'twentyfifthchild')}
                    </Button>
                </div>
            </div>
        </section>
    );
};

export default Edit;
