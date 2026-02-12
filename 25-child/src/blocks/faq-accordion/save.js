export default function Save({ attributes }) {
	return (
		<div {...useBlockProps.save({ className: 'fz-faq-wrapper' })}>
			<RichText.Content tagName="h2" value={attributes.heading} />
			<div className="fz-accordion-container">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
