<?php

namespace JasonRoman\NbaApi\Request\Data\GameExperience\Team;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\GameExperience\AbstractDataGameExperienceRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the brand information for a particular team.
 */
class TeamDefaultRequest extends AbstractDataGameExperienceRequest
{
    const ENDPOINT = '/json/ge/{teamSlug}/default.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;
}