/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";
import {
	InspectorControls,
	useBlockProps,
	InnerBlocks,
} from "@wordpress/block-editor";
import { PanelBody, PanelRow, SelectControl } from "@wordpress/components";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { direction, content } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody>
					<PanelRow>
						<SelectControl
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							label="Animation Direction"
							onChange={(value) => {
								setAttributes({ direction: value });
							}}
							options={[
								{
									default: true,
									label: "Up",
									value: "fade-up",
								},
								{
									label: "Down",
									value: "fade-down",
								},
								{
									label: "Left",
									value: "fade-left",
								},
								{
									label: "Right",
									value: "fade-right",
								},
								{
									label: "Zoom In",
									value: "zoom-in",
								},
								{
									label: "Zoom Out",
									value: "zoom-out",
								},
							]}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<InnerBlocks />
			</div>
		</>
	);
}
