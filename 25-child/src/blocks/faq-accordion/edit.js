import { RichText, InnerBlocks, useBlockProps } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps({ className: 'fz-faq-accordion-block' });
    const ALLOWED_BLOCKS = ['fz/faq-item'];
    const TEMPLATE = [['fz/faq-item'], ['fz/faq-item']];

    return (
        <div {...blockProps}>
            <RichText
                tagName="h2"
                value={attributes.heading}
                onChange={(val) => setAttributes({ heading: val })}
                placeholder="Enter FAQ Title..."
            />
            <div className="faq-items-admin-container">
                <InnerBlocks
                    allowedBlocks={ALLOWED_BLOCKS}
                    template={TEMPLATE}
                    templateLock={false}
                />
            </div>
        </div>
    );
}
