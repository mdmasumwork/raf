/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save({attributes, setAttributes}) {
	const { name, designation, imageUrl, imageAlt, modalId } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			<div className="staff-card" data-id={modalId}>
				{imageUrl && (
					<img src={imageUrl} alt={imageAlt} className="staff-card-staff-image"/>
				)}
				<div className="staff-card-content">
					<h3 tagName="h3" className="staff-name">{name}</h3>
					<p tagName="p" className="staff-designation">{designation}</p>
				</div>
			</div>
			<div className="staff-modal" id={modalId}>
				<div className="close-icon">
					<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 6.5L6 18.5M6 6.5L18 18.5" stroke="white" stroke-width="2" stroke-linecap="round"
							  stroke-linejoin="round"/>
					</svg>
				</div>
				<div className="staff-modal-content">
					{imageUrl && (
						<div className="staff-modal-staff-image desktop-view">
							<img src={imageUrl} alt={imageAlt}/>
						</div>
					)}
					<div className="staff-modal-text">
						<div className="staff-modal-staff-signature">
							<div className="name-area">
								{imageUrl && (
									<div className="staff-modal-staff-image mobile-view">
										<img src={imageUrl} alt={imageAlt}/>
									</div>
								)}
								<h3 tagName="h3" className="staff-name">{name}</h3>
							</div>
							<p tagName="p" className="staff-designation">{designation}</p>
						</div>
						<div className="staff-description">
							<InnerBlocks.Content/>
						</div>
					</div>
				</div>
			</div>
			<div className="staff-modal-overlay"></div>
		</div>
	);
}
