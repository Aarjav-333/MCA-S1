class Solution(object):
    def TwoSum(self, nums, target) :
        seen = {}
        for i, num in enumerate(nums):
            complement = target - num
            if complement in seen:
                return [seen[complement], i]
            seen[num] = i
        return []

solution = Solution()
print(solution.TwoSum([2,7,3,10],10))
