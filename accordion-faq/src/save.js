import { useBlockProps, RichText } from '@wordpress/block-editor';

const Save = ({ attributes }) => {
	const { heading, faqs } = attributes;
	const blockProps = useBlockProps.save();

	return (
		<section {...blockProps}>
			<div className="faq-wrapper">
				<RichText.Content tagName="h2" value={heading} className="faq-main-title" />
				<div className="faq-container-list">
					{faqs.map((faq, index) => (
						<div key={index} className="faq-item">
							<button className="faq-question-trigger">
								<span className="faq-number"></span>
								<RichText.Content tagName="span" className="faq-title" value={faq.faqQuestion} />
								<span className="faq-icon">
									<svg className="icon-plus" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1v18M1 10h18" stroke="currentColor" strokeWidth="2" /></svg>
									<svg className="icon-minus" width="20" height="20" viewBox="0 0 20 20" style={{ display: 'none' }}><path d="M1 10h18" stroke="currentColor" strokeWidth="2" /></svg>
								</span>
							</button>
							<div className="faq-answer-content" style={{ display: 'none' }}>
								<RichText.Content tagName="div" value={faq.faqAnswer} />
							</div>
						</div>
					))}
				</div>
			</div>
		</section>
	);
};
export default Save;
