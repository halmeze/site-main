<?php
/**
 * @Copyright
 * @package        JVE - Joomla Vote Extended for Joomla! 3.x
 * @author         Viktor Vogel <admin@kubik-rubik.de>
 * @version        3.3.0 - 2017-01-08
 * @link           https://joomla-extensions.kubik-rubik.de/jve-joomla-vote-extended
 *
 * @license        GNU/GPL
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined('_JEXEC') or die('Restricted access');

class PlgContentJoomlaVoteExtended extends JPlugin
{
	protected $view_article = false;
	protected $autoloadLanguage = true;

	/**
	 * Plugin is executed when the trigger onContentPrepare is called to add the rating stars
	 *
	 * @param string  $context
	 * @param object  $row
	 * @param string  $params
	 * @param integer $page
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		if(stripos($context, 'com_content') === false)
		{
			return false;
		}

		if(!empty($params) AND empty($params->get('show_vote', null)))
		{
			return false;
		}

		if($this->excludeArticleId($row->id) === true)
		{
			return false;
		}

		$view_loaded = JFactory::getApplication()->input->getString('view', '');

		if($view_loaded == 'article')
		{
			$this->view_article = true;
		}

		$view_only_article = $this->params->get('articleview', 0);

		if($view_only_article AND empty($this->view_article))
		{
			return false;
		}

		$this->renderVoteOutput($row);

		return true;
	}

	/**
	 * Checks the ID of the article against a black list
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	private function excludeArticleId($id)
	{
		$exclude_articles_ids = $this->params->get('exclude_articles_ids');

		if(!empty($exclude_articles_ids))
		{
			$exclude_articles_ids = array_map('trim', explode(',', $exclude_articles_ids));

			if(in_array($id, $exclude_articles_ids))
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Adds the HTML output for the rating stars to the article text
	 *
	 * @param $row
	 *
	 * @return bool
	 */
	private function renderVoteOutput(&$row)
	{
		$html = $this->getVoteOutput($row);

		if(!empty($html))
		{
			if($this->params->get('position', 0) == 0)
			{
				$row->text = $html.$row->text;

				return true;
			}

			$row->text .= $html;
		}

		return true;
	}

	/**
	 * Gets HTML code and adds JSS / CSS information
	 *
	 * @param $row
	 *
	 * @return string
	 */
	private function getVoteOutput($row)
	{
		$rating = 0;
		$best_rating = 5;
		$rating_count = 0;
		$statistics = $this->params->get('statistics', 0);
		$decimals = $this->params->get('decimals', 0);
		$intro_text = $this->params->get('introtext', '');

		$this->getRatingData($decimals, $row, $rating, $rating_count);

		$html = '<!-- JVE - Joomla Vote Extended - Kubik-Rubik Joomla! Extensions -->';
		$html .= '<div class="content_rating" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">';
		$html .= '<p class="unseen element-invisible">'.JText::sprintf('PLG_JOOMLAVOTEEXTENDED_USER_RATING', '<span itemprop="ratingValue">'.$rating.'</span>', '<span itemprop="bestRating">'.$best_rating.'</span>').'<meta itemprop="ratingCount" content="'.$rating_count.'" />'.'<meta itemprop="worstRating" content="0" />'.'</p>';

		if(!empty($this->view_article) AND !empty($intro_text))
		{
			$html .= '<div class="jve-introtext">'.JText::_($intro_text).'</div>';
		}

		$html .= '<div class="jve-stars"><span id="jve-'.$row->id.'"></span><span id="jve-response"></span></div>';

		if(!empty($this->view_article) AND !empty($statistics))
		{
			$html .= '<div class="jve-statistics">'.JText::sprintf('PLG_JOOMLAVOTEEXTENDED_STATISTICS_FRONTEND', $rating, $best_rating, $rating_count).'</div>';
		}

		$html .= '</div>';

		$this->loadHeadData($rating, $row->id, $row->state, $html);

		return $html;
	}

	/**
	 * Gets the rating information for the loaded article
	 *
	 * @param $decimals
	 * @param $row
	 * @param $rating
	 * @param $rating_count
	 *
	 * @return bool
	 */
	private function getRatingData($decimals, $row, &$rating, &$rating_count)
	{
		if(empty($decimals))
		{
			if(!empty($row->rating))
			{
				$rating = (int)$row->rating;
			}

			if(!empty($row->rating_count))
			{
				$rating_count = (int)$row->rating_count;
			}

			return true;
		}

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('ROUND(rating_sum / rating_count, 2) AS rating, rating_count');
		$query->from('#__content_rating');
		$query->where('content_id = '.(int)$row->id);
		$db->setQuery($query);
		$rating_data = $db->loadObject();

		if(!empty($rating_data->rating))
		{
			$rating = $rating_data->rating;
		}

		if(!empty($rating_data->rating_count))
		{
			$rating_count = $rating_data->rating_count;
		}
	}

	/**
	 * Loads correct data to the <head> section
	 *
	 * @param $rating
	 * @param $id
	 * @param $state
	 */
	private function loadHeadData($rating, $id, $state, &$html)
	{
		$document = JFactory::getDocument();
		static $load_once = true;

		if($load_once == true)
		{
			JHtml::_('jquery.framework');
			$document->addStyleSheet('plugins/content/joomlavoteextended/assets/css/star-rating-svg.css', 'text/css');
			$document->addScript('plugins/content/joomlavoteextended/assets/jss/jquery.star-rating-svg.min.js', 'text/javascript');

			if(!$this->view_article)
			{
				$document->addStyleDeclaration('.jq-star{cursor: default;}');
			}

			$load_once = false;
		}

		$script = 'jQuery(document).ready(function(){
					jQuery("#jve-'.$id.'").starRating({ 
						starSize: 20,
						totalStars: 5,
						useFullStars: true,
						initialRating: '.$rating.',
						';

		if($state == 1 AND !empty($this->view_article))
		{
			$response_message = JText::_('PLG_JOOMLAVOTEEXTENDED_ARTICLE_VOTE_SUCCESS');
			$messages = JFactory::getApplication()->getMessageQueue();

			if(!empty($messages))
			{
				$message_array = array();

				foreach($messages as $message)
				{
					if(!empty($message['message']))
					{
						$message_array[] = $message['message'];
					}
				}

				$response_message = implode(' ', $message_array);
			}

			// Handle response properly even if cache functionality is used
			$url = JUri::getInstance();
			$url_query = $url->getQuery(true);
			$url_query['jve'] = time();
			$url->setQuery($url_query);

			$script .= 'callback: function(currentRating, $el){ 
					        jQuery.post("'.htmlspecialchars($url->toString()).'",{ 
					            url: "'.htmlspecialchars($url->toString()).'",
			                    task: "article.vote", 
							    hitcount: "0", 
							    user_rating: currentRating,
							    "'.JSession::getFormToken().'": 1
						    }).done(function (response){
						        var response_message = "'.$response_message.'";
						        var rating_output = "<span class=\"jve-message\">'.$response_message.'</span>";
						        var rating_response = response.match(/<span class="jve-invisible">([^<]*)<\/span>/);
								if(jQuery.isArray(rating_response) && rating_response[1])
								{
									var rating_output = "<span class=\"jve-message\">" + rating_response[1] + "</span>";
								}
			                    jQuery("#jve-response").empty().append(rating_output);
							});
				        }';

			$html .= '<span class="jve-invisible">'.$response_message.'</span>';
		}
		else
		{
			$script .= 'readOnly: true';
		}

		$script .= '});
				 });';

		$document->addScriptDeclaration($script);
	}
}
